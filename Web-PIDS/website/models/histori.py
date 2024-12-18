# models/histori.py
from flask import current_app
import mysql.connector

class Histori:
    def __init__(self, id_histori, id_kereta, id_point, status, waktu):
        self.id_histori = id_histori  # Atribut untuk kolom 'id_histori'
        self.id_kereta = id_kereta  # Atribut untuk kolom 'id_kereta'
        self.id_point = id_point  # Atribut untuk kolom 'tanggal'
        self.status = status  # Atribut untuk kolom 'keterangan'
        self.waktu = waktu

    @staticmethod
    def get_all_histori():
        connection = mysql.connector.connect(
            host=current_app.config['MYSQL_HOST'],
            user=current_app.config['MYSQL_USER'],
            password=current_app.config['MYSQL_PASSWORD'],
            database=current_app.config['MYSQL_DB']
        )
        cursor = connection.cursor(dictionary=True)
        cursor.execute('SELECT * FROM histori')  # Ganti dengan nama tabel Anda
        histori = cursor.fetchall()
        cursor.close()
        connection.close()
        return [Histori(**item) for item in histori]  # Menggunakan unpacking untuk menginisialisasi objek
