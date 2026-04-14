from sklearn.model_selection import train_test_split
from imblearn.over_sampling import SMOTE, RandomOverSampler
from sklearn.preprocessing import LabelEncoder
from sklearn.naive_bayes import GaussianNB, CategoricalNB
from sklearn.metrics import accuracy_score
import pandas as pd
import json


def process_data(df):

    df = df.copy()

    # =========================
    # ENCODING
    # =========================
    encoders = {}

    for col in df.columns:
        if df[col].dtype == 'object':
            le = LabelEncoder()
            df[col] = le.fit_transform(df[col])
            encoders[col] = le

    # =========================
    # SPLIT
    # =========================
    X = df.drop(columns=['status_penjualan'])
    y = df['status_penjualan']

    X_train, X_test, y_train, y_test = train_test_split(
        X, y,
        test_size=0.2,
        random_state=42,
        stratify=y
    )

    # =========================
    # SMOTE & ROS
    # =========================
    smote = SMOTE(random_state=42)
    X_sm, y_sm = smote.fit_resample(X_train, y_train)

    ros = RandomOverSampler(random_state=42)
    X_ros, y_ros = ros.fit_resample(X_train, y_train)

    # =========================
    # MODEL BASELINE
    # =========================
    model_nb = GaussianNB()
    model_nb.fit(X_train, y_train)
    pred_nb = model_nb.predict(X_test)
    acc_nb = accuracy_score(y_test, pred_nb)

    # =========================
    # MODEL SMOTE
    # =========================
    model_smote = GaussianNB()
    model_smote.fit(X_sm, y_sm)
    pred_smote = model_smote.predict(X_test)
    acc_smote = accuracy_score(y_test, pred_smote)

    # =========================
    # MODEL ROS
    # =========================
    model_ros = GaussianNB()
    model_ros.fit(X_ros, y_ros)
    pred_ros = model_ros.predict(X_test)
    acc_ros = accuracy_score(y_test, pred_ros)

    # =========================
    # STDOUT (UNTUK PHP / API)
    # =========================
    output = {
        "accuracy_nb": acc_nb,
        "accuracy_smote": acc_smote,
        "accuracy_ros": acc_ros
    }

    print(json.dumps(output))

    # =========================
    # DECODE FUNCTION
    # =========================
    def decode(df_local):
        df_local = df_local.copy()

        for col, le in encoders.items():
            if col in df_local.columns:
                df_local[col] = le.inverse_transform(df_local[col].astype(int))

        return df_local

    # =========================
    # RETURN DATASET (PHP tetap bisa pakai)
    # =========================
    train = decode(pd.concat([X_train, y_train], axis=1))
    test = decode(pd.concat([X_test, y_test], axis=1))
    smote_df = decode(pd.concat([X_sm, y_sm], axis=1))
    ros_df = decode(pd.concat([X_ros, y_ros], axis=1))

    return {
        "train": train.to_dict(orient='records'),
        "test": test.to_dict(orient='records'),
        "smote": smote_df.to_dict(orient='records'),
        "ros": ros_df.to_dict(orient='records')
    }