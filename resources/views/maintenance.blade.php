<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas Rehab - Coming Soon</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
            overflow-y: auto;
            position: relative;
        }

        /* Animated background elements */
        .bg-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            left: 80%;
            animation-delay: -5s;
        }

        .floating-element:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 20%;
            animation-delay: -10s;
        }

        .floating-element:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 70%;
            animation-delay: -3s;
        }

        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .main-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 60px 40px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            transform: translateY(20px);
            animation: slideUp 1s ease-out forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
            }
        }

        .logo {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            border-radius: 50%;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(76, 175, 80, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .logo i {
            font-size: 60px;
            color: white;
        }

        h1 {
            font-size: 3em;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 700;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            font-size: 1.3em;
            color: #34495e;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .description {
            font-size: 1.1em;
            color: #7f8c8d;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 40px 0;
            flex-wrap: wrap;
        }

        .countdown-item {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px 15px;
            border-radius: 15px;
            min-width: 80px;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            transform: translateY(0);
            transition: transform 0.3s ease;
        }

        .countdown-item:hover {
            transform: translateY(-5px);
        }

        .countdown-number {
            font-size: 2.5em;
            font-weight: bold;
            display: block;
        }

        .countdown-label {
            font-size: 0.9em;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .contact-info {
            background: #f8f9fa;
            border-radius: 20px;
            padding: 30px;
            margin: 40px 0;
            border-left: 5px solid #4CAF50;
        }

        .contact-info h3 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.3em;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: #34495e;
            font-size: 1.1em;
        }

        .contact-item i {
            width: 25px;
            color: #4CAF50;
            margin-right: 15px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            font-size: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .social-link:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .newsletter {
            margin-top: 40px;
        }

        .newsletter h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .newsletter input {
            padding: 15px 20px;
            border: 2px solid #e1e8ed;
            border-radius: 25px;
            font-size: 1em;
            min-width: 250px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .newsletter input:focus {
            border-color: #667eea;
        }

        .newsletter button {
            padding: 15px 30px;
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .newsletter button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 40px 20px;
                margin: 20px;
            }

            h1 {
                font-size: 2.2em;
            }

            .countdown {
                gap: 15px;
            }

            .countdown-item {
                min-width: 70px;
                padding: 15px 10px;
            }

            .countdown-number {
                font-size: 2em;
            }

            .newsletter input {
                min-width: 200px;
                margin-bottom: 10px;
            }

            .contact-info {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.8em;
            }

            .subtitle {
                font-size: 1.1em;
            }

            .newsletter input {
                min-width: 100%;
                margin-bottom: 10px;
            }

            .newsletter button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="bg-animation">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="container">
        <div class="main-content">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
            </div>

            <h1>Maintenance</h1>
            <p class="description">
                Saat ini website komunitasrehab.id sedang dalam masa pemelihraan, mohon kembali beberapa waktu lagi,
                terima kasih.
            </p>
        </div>
    </div>
</body>

</html>
