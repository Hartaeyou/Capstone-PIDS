from flask import Blueprint, render_template
from .models.histori import Histori
from .models.kereta import Kereta
from .models.rute import Rute
from .models.point import Point

main = Blueprint('main', __name__)

@main.route('/')
def index():
    histori_data = Histori.get_all_histori()
    kereta_data = Kereta.get_all_keretas()
    rute_data = Rute.get_all_rutes()
    point_data = Point.get_all_points()

    # Ambil data kereta dengan id_kereta = 1
    kereta_1 = next((kereta for kereta in kereta_data if kereta.id_kereta == 1), None)

    # Ambil nama_rute dari kereta_1
    nama_rute = kereta_1.nama_rute if kereta_1 else None
    print("Nama Rute: %s", nama_rute)

    # Ambil id_point dari tabel rute berdasarkan nama_rute
    id_points = [rute.id_point for rute in rute_data if rute.nama_rute == nama_rute]
    print("ID Points: %s", id_points)

    # Ambil nama_stasiun dari tabel point berdasarkan id_point yang didapat
    stasiun_list = [point.nama_stasiun for point in point_data if point.id_point in id_points]
    print("Stasiun List: %s", stasiun_list)

    return render_template('base.html', histori=histori_data, kereta=kereta_data, rute=rute_data, point=point_data, kereta_1=kereta_1, stasiun_list=stasiun_list)