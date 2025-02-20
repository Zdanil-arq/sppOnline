<?php
$jenis = ["KAMERA MIRRORLESS", "KAMERA DSLR"];
$kamera = [
    "produk1" => [
        "img" => "img/pp1.jpg",
        "nama" => "Sony a6700 Body Only",
        "harga" => 21900000,
        "diskon" => 5,
        "jenis" => "KAMERA MIRRORLESS"
    ],
    "produk2" => [
        "img" => "img/p1.jpg",
        "nama" => "Canon EOS R100 with 18-45mm IS STM Lens",
        "harga" => 6900000,
        "diskon" => 10,
        "jenis" => "KAMERA MIRRORLESS"
    ],
    "produk3" => [
        "img" => "img/p2.jpg",
        "nama" => "Nikon Z fc Body Only Silver",
        "harga" => 16600000,
        "diskon" => 5,
        "jenis" => "KAMERA MIRRORLESS"
    ],
    "produk4" => [
        "img" => "img/p3.jpg",
        "nama" => "Canon 200D EOS with EF-S 18-55mm IS STM Black",
        "harga" => 7000000,
        "diskon" => 5,
        "jenis" => "KAMERA DSLR"
    ],
    "produk5" => [
        "img" => "img/p5.jpg",
        "nama" => "Nikon D7500 Kit AF-S DX 18-140mm f/3.5-5.6G ED VR",
        "harga" => 22000000,
        "diskon" => 10,
        "jenis" => "KAMERA DSLR"
    ],
    "produk6" => [
        "img" => "img/p4.jpg",
        "nama" => "Canon 850D EOS with 18-55mm IS STM Black",
        "harga" => 16000000,
        "diskon" => 5,
        "jenis" => "KAMERA DSLR"
    ]
];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_POST['jenis'];
    if ($key != "") {
        foreach ($kamera as $produk) {
            if ($produk['jenis'] == $key) {
                $hasil[] = $produk;
            }
        }
    } else {
        $hasil = $kamera; 
    }   
}else {
    $hasil = $kamera; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: Arial;
            background-color: #f0f0f0;
        }
        .nav{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: 60px;
            background-color: white;
        }
        .nav img {
            width: 60px;
            margin-left: 20px;
        }
        .navbar1{
            /* width: 100%; */
            height: 100%;
            display: flex;
        }
        .navbar2{
            margin-left: 20px;
            background-color:#77B122;
            height:100%;
            width: 600px;
            gap: 20px;
            display: flex;
            align-items: center;      
            justify-content: center;
            border-radius: 0 0 20px 20px;
            padding-bottom: 18px;
        }
        .navbar1 a{
            text-decoration: none;
            color: white;
            font-weight: bold;
        }
        .navbar1 a:hover{
            opacity: 0.3;
            transform: scale(.85);
        }
        .login a{
            border-radius: 50px;
            padding: 8px 27px;
            margin-right: 40px;
            text-decoration: none;
            font-size: 20px;
            color: #FFF;
            background-color: #77B122;
        }



        .kategori{
            margin-top:40px;
            height: 5  0px;
            /* padding-top: 20px; */
        }
        .kategori form{
            text-align: center; 
        }
        select{
            padding: 8px;
            border-radius: 5px;
        }
        button{
            background-color: #303030;
            color: white;
            border: 1px solid;
            padding: 8px 10px;
            border-radius: 5px;
        }
        button:hover{
            color: #303030;
            background-color: white;
            box-shadow: 0 0 5px black
        }



        .konten {
            width: 80%;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            padding:20px;
            gap:20px;
            margin: auto;
            margin-bottom: 50px;
        }
        .item{
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        .item:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 10px black;
        }
        .harga{
            text-decoration: line-through;
        }
        img{
            width: 100%;
        }
        .total{
            color: red;
            font-size: 20px;
            font-weight: bold;
        }



        footer{
            height: 80px;
            background-color: #303030;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .copyright p{
            color: white;
        }
    </style>
    <title>Kamera</title>
</head>
<body>
    <nav>
        <div class="nav">
            <div class="navbar1">
                <img src="img/logok1.png" alt="">
                <div class="navbar2">
                <a href="beranda.php">BERANDA</a>
                <a href="kamera.php">KAMERA</a>
                <a href="lensa.php">LENSA</a>
                <a href="aksesoris.php">AKSESORIS</a>
                <a href="tentangkami.php">TENTANG KAMI</a>
                </div>
            </div>
            <div class="login">
                <a href="login.php">Login</a>
            </div>
        </div>
    </nav>




    <div class="kategori">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="">Pilih Jenis:</label>
            <select name="jenis" id="">
                <option value="" selected>SEMUA JENIS</option>
                <?php foreach ($jenis as $j): ?>
                    <option value="<?php echo $j; ?>" <?php echo isset($key) && $key == $j ? 'selected' : ''; ?>>
                        <?php echo $j; ?>
                    </option>
                <?php endforeach ?>
            </select>
            <button type="submit">Pilih</button>
        </form>
    </div>



    <div class="konten">
        <?php if (!empty($hasil)) : ?>
            <?php foreach ($hasil as $k): ?>
                
                <?php $diskon = isset($k['diskon']) ? $k['harga'] - ($k['harga'] * $k['diskon'] / 100) : $k['harga']; ?>


                <div class="item">
                    <img src="<?php echo $k['img']; ?>" alt="<?php echo $k['nama']; ?>">
                    <h2><?php echo $k['nama']; ?></h2>
                    <p class="harga">Rp<?php echo number_format($k['harga'], 0, ',', '.'); ?></p>
                    <?php if (isset($k['diskon'])): ?>
                        <h6>Diskon <?php echo $k['diskon']; ?>%</h6>
                    <?php endif; ?>  
                    <p class="total">Rp<?php echo number_format($diskon, 0, ',', '.'); ?></p>
                </div>


            <?php endforeach; ?>
        <?php else: ?>
            
        <?php endif; ?>
    </div>



    <footer>
        <div class="copyright">
            <p>Copyright © 2024 Kamera.com</p>
        </div>
    </footer>
</body>
</html>


