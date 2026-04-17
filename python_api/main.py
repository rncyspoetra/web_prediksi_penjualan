from flask import Flask, request, jsonify
import pandas as pd
from preprocessing import process_data

app = Flask(__name__)

@app.route('/preprocess', methods=['POST'])
def preprocess():
    try:
        data = request.json['data']

        df = pd.DataFrame(data)

        result = process_data(df)

        return jsonify(result)

    except Exception as e:
        return jsonify({"error": str(e)})

if __name__ == '__main__':
    app.run(debug=True, use_reloader=False)