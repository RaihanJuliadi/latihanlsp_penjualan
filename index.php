<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
</head>

<body>
    <h1> Pilih Data Produk</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td> Pilih Produk </td>
                <td>:</td>
                <td>

                    <select name="id" value="">
                        <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM data_barang";
                        $hasil = mysqli_query($conn, $sql);

                        while ($data = mysqli_fetch_array($hasil)) {
                            $ket = "";
                            if (isset($_GET['id'])) {
                                $id = trim($_GET['id']);

                                if ($id == $data['id']) {
                                    $ket = "selected";
                                }
                            }
                        ?>

                            <option <?php echo $ket; ?> value="<?php echo $data['id']
                                                                ?>"> <?php echo $data['id']; ?>
                                - <?php echo $data['Nama_Barang']; ?>
                            </option>
                        <?php
                        }
                        ?>

                    </select>
                </td>
                <td>
                    <button type="submit" name="submit">Pilih</button>
                </td>
            </tr>
        </table>
        </from>

        <?php
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $sql = "SELECT * FROM data_barang WHERE id = $id";
            $hasil = mysqli_query($conn, $sql);
            $data =  mysqli_fetch_assoc($hasil);
        }
        ?>
        <h2>Detail Data Produk</h2>
        <form action="">
            <table>
                <tr>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td><input type="text" nama="Nama_Barang" value="<?php if (isset($data['Nama_Barang'])) echo $data['Nama_Barang']; ?>"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td><input type="text" id="harga" nama="Harga" value="<?php if (isset($data['Harga'])) echo $data['Harga']; ?>"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td>:</td>
                    <td><input type="text" nama="Stok" value="<?php if (isset($data['Stok'])) echo $data['Stok']; ?>"></td>
                </tr>
                <tr>
                    <td>Jumlah Barang</td>
                    <td>:</td>
                    <td><input type="text" id="jumlahBarang" nama="Stok" value=""></td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td>:</td>
                    <td><input type="text" id="total" nama="Stok" value=""></td>
                </tr>
            </table>
            <br>

            <button id="jumlah">Jumlah</button>
            <input type="submit" name="submit" value="Hapus">
            <input type="submit" name="submit" value="Submit">
        </form>

        <script>
            const jumlah = document.querySelector('form #jumlah')
            jumlah.onclick = (e) => {
                e.preventDefault();
                var bil1 = document.querySelector('form #harga').value;
                var bil2 = document.querySelector('form #jumlahBarang').value;
                var hasil = bil1 * bil2;

                document.querySelector('form #total').value = hasil;
            }
        </script>


</body>

</html>