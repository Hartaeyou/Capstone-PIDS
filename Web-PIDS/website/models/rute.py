# models/rute.py
from flask import current_app
import mysql.connector

class Rute:
    def __init__(self, id_rute, nama_rute, sequence_point, id_point):
        self.id_rute = id_rute  # Atribut untuk kolom 'id'
        self.nama_rute = nama_rute  # Atribut untuk kolom 'start_point_id'
        self.sequence_point = sequence_point  # Atribut untuk kolom 'end_point_id'
        self.id_point = id_point

    @staticmethod
    def get_all_rutes():
        connection = mysql.connector.connect(
            host=current_app.config['MYSQL_HOST'],
            user=current_app.config['MYSQL_USER'],
            password=current_app.config['MYSQL_PASSWORD'],
            database=current_app.config['MYSQL_DB']
        )
        cursor = connection.cursor(dictionary=True)
        cursor.execute('SELECT * FROM rute')  # Ganti dengan nama tabel Anda
        rutes = cursor.fetchall()
        cursor.close()
        connection.close()
        return [Rute(**rute) for rute in rutes]  # Menggunakan unpacking untuk menginisialisasi objek