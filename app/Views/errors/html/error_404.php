<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= lang('Errors.pageNotFound') ?></title>

    <style>
        /* Gaya untuk track (background) scrollbar */
        ::-webkit-scrollbar {
            width: 8px; /* Lebar scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1; /* Warna background track */
            border-radius: 5px; /* Membuat track lebih rounded */
        }

        /* Gaya untuk handle atau thumb scrollbar */
        ::-webkit-scrollbar-thumb {
            background: #888; /* Warna handle scrollbar */
            border-radius: 5px; /* Membuat handle lebih rounded */
        }

        /* Gaya untuk handle scrollbar saat di-hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555; /* Warna handle saat di-hover */
        }
        div.logo {
            height: 200px;
            width: 155px;
            display: inline-block;
            opacity: 0.08;
            position: absolute;
            top: 2rem;
            left: 50%;
            margin-left: -73px;
        }
        body {
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fafafa;
            font-family: "Helvetica 3  Neue", Helvetica, Arial, sans-serif;
            color: #777;
            font-weight: 300;
            background: url("<?= base_url('assets/hero/hero.jpg') ?>") fixed center center;
            background-size: cover;
            background-repeat: no-repeat;
            overflow: hidden;
        }
        h1 {
            font-weight: lighter;
            letter-spacing: normal;
            font-size: 5rem;
            margin-top: 0;
            margin-bottom: 0;
            color: #222;
        }
        .wrap {
            /* max-width: 1024px; */
            width: 52%;
            height: 50vh;
            /* margin: 5rem auto; */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            /* background: #fff; */
            background: rgba(255,255,255,0.4);
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.07); */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 1px solid rgb(239, 239, 239, 0.6);
            backdrop-filter: blur(5px);
            border-radius: 0.5rem;
            overflow: hidden;
            position: relative;
            z-index: 999;
        }
        .wrap::before{
            content: "";
            position: absolute;
            top: 40px;
            left: 40px;
            width: 150px;
            height: 150px;
            background: conic-gradient(
                from 0deg,
    #ff0000,
    #ffa500,
    #ffff00,
    #008000,
    #0000ff,
    #4b0082,
    #ee82ee,
    #ff0000
  );
            animation: moveColors 5s infinite alternate; /* Animasi warna bergerak */
            filter: blur(30px);
            border-radius: 0.5rem;
            pointer-events: none;
            z-index: 0; 
        }
        /* Keyframes untuk animasi */
@keyframes moveColors {
  0% {
    transform: translate(0, 0);
  }
  25% {
    transform: translate(-20px, 30px);
  }
  50% {
    transform: translate(20px, -20px);
  }
  75% {
    transform: translate(-30px, -10px);
  }
  100% {
    transform: translate(10px, 30px);
  }
}
        .wrap::after{
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(255,255,255,0.2);
            /* filter: blur(30px); */
            border-radius: 0.5rem;
            pointer-events: none;
            z-index: 0; 
        }

        .snake{
            position: absolute;
  width: 40px;
  height: 40px;
  background: radial-gradient(circle, rgba(255, 100, 150, 1), rgba(255, 180, 0, 1), rgba(50, 200, 255, 1));
  border-radius: 50%;
  filter: blur(15px);
  transition: transform 1.5s ease, background 2s ease; /* Gerakan dan perubahan warna */
        }

        .snake1{
            position: absolute;
  top: 50%;
  left: 50%;
  width: 300px;
  height: 50px;
  background: linear-gradient(90deg, 
    rgba(255, 100, 150, 1) 0%, 
    rgba(255, 180, 0, 1) 25%, 
    rgba(50, 200, 255, 1) 50%, 
    rgba(0, 255, 150, 1) 75%, 
    rgba(255, 100, 150, 1) 100%);
  border-radius: 25px;
  filter: blur(20px); /* Memberikan efek glow */
  animation: snakeMove 6s infinite ease-in-out, snakeColor 3s infinite linear;
  transform: translate(-50%, -50%);
        }

/* Animasi gerakan ular */
@keyframes snakeMove {
  0% {
    transform: translate(0, 0) rotate(0deg);
  }
  25% {
    transform: translate(-30px, -50px) rotate(20deg);
  }
  50% {
    transform: translate(40px, 20px) rotate(-15deg);
  }
  75% {
    transform: translate(-20px, 30px) rotate(10deg);
  }
  100% {
    transform: translate(0, 0) rotate(0deg);
  }
}

/* Animasi perubahan warna */
@keyframes snakeColor {
  0% {
    background: linear-gradient(90deg, 
      rgba(255, 100, 150, 1) 0%, 
      rgba(255, 180, 0, 1) 25%, 
      rgba(50, 200, 255, 1) 50%, 
      rgba(0, 255, 150, 1) 75%, 
      rgba(255, 100, 150, 1) 100%);
  }
  50% {
    background: linear-gradient(90deg, 
      rgba(50, 200, 255, 1) 0%, 
      rgba(0, 255, 150, 1) 25%, 
      rgba(255, 100, 150, 1) 50%, 
      rgba(255, 180, 0, 1) 75%, 
      rgba(50, 200, 255, 1) 100%);
  }
  100% {
    background: linear-gradient(90deg, 
      rgba(255, 100, 150, 1) 0%, 
      rgba(255, 180, 0, 1) 25%, 
      rgba(50, 200, 255, 1) 50%, 
      rgba(0, 255, 150, 1) 75%, 
      rgba(255, 100, 150, 1) 100%);
  }
}


        /* batas */
        pre {
            white-space: normal;
            margin-top: 1.5rem;
        }
        code {
            background: #fafafa;
            border: 1px solid #efefef;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            display: block;
        }
        p {
            margin-top: 1.5rem;
            font-weight: 500;
            font-size: 1.5rem;
            color: #222;
        }
        .footer {
            margin-top: 2rem;
            border-top: 1px solid #efefef;
            padding: 1em 2em 0 2em;
            font-size: 85%;
            color: #999;
        }
        a{
            padding: 12px 28px;
            width: 100%;
            background: #384c57;
            border-radius: 0.5rem;
            color: #fafafa !important;
            z-index: 99999;
        }
        a:active,
        a:link,
        a:visited {
            color: #dd4814;
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="snake"></div>
        <div class="snake1"></div>
        <div>
            <h1>404</h1>

            <p>
                <?php if (ENVIRONMENT !== 'production') : ?>
                    <?= nl2br(esc($message)) ?>
                <?php else : ?>
                    <?= lang('Errors.sorryCannotFind') ?>
                <?php endif; ?>
            </p>
            <?php if(session()->get('username')): ?>
                <a href="<?= base_url('/beranda') ?>">Kembali ke Beranda</a>
            <?php else: ?>
                <a href="<?= base_url('/') ?>">Kembali ke Beranda</a>
            <?php endif; ?>
        </div>
    </div>

    <script>
        const snake = document.querySelector('.snake');
const container = document.querySelector('.wrap');

// Fungsi untuk menghasilkan posisi dan warna acak
function moveSnake() {
  const containerRect = container.getBoundingClientRect();

  // Tentukan posisi baru secara acak
  const newX = Math.random() * (containerRect.width - 40);
  const newY = Math.random() * (containerRect.height - 40);

  // Tentukan warna acak baru
  const randomColor1 = `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`;
  const randomColor2 = `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`;
  const randomColor3 = `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`;

  // Ubah posisi dan warna ular
  snake.style.transform = `translate(${newX}px, ${newY}px)`;
  snake.style.background = `radial-gradient(circle, ${randomColor1}, ${randomColor2}, ${randomColor3})`;

  // Panggil kembali fungsi ini setelah interval waktu
  setTimeout(moveSnake, 2000);
}

// Panggil fungsi pertama kali
moveSnake();
    </script>
</body>
</html>
