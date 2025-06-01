<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Overview</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            max-width: 900px;
            margin: 60px auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        p {
            line-height: 1.6;
        }

        code {
            background: #eaeaea;
            padding: 3px 6px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
        }

        pre {
            background: #f4f6f9;
            padding: 15px;
            border-left: 5px solid #007bff;
            border-radius: 8px;
            margin-top: 10px;
            overflow-x: auto;
        }

        .php-output {
            background-color: #eaf7ea;
            padding: 15px;
            border-left: 5px solid #28a745;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            margin-top: 10px;
            color: #1c4020;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 20px;
        }

        ul li::before {
            content: "✔";
            position: absolute;
            left: 0;
            color: #007bff;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .section {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🌐 PHP Overview</h1>

    <div class="section">
        <p><strong>PHP</strong> (Hypertext Preprocessor) is a widely-used, open source server-side scripting language specially suited for web development. PHP scripts are executed on the server and generate dynamic content.</p>
    </div>

    <div class="section">
        <h2>📌 Basic PHP Syntax</h2>
        <p>You write PHP code between <code>&lt;?php ... ?&gt;</code> tags. Here's a simple example:</p>
        <pre>
&lt;?php
    echo "Hello, world!";
?&gt;
        </pre>
    </div>

    <div class="section">
        <h2>⚙️ Output Example</h2>
        <p>This PHP code uses variables and does a basic calculation:</p>
        <pre>
&lt;?php
    $name = "Alice";
    $a = 5;
    $b = 3;
    $sum = $a + $b;
    echo "Hello $name, 5 + 3 = $sum";
?&gt;
        </pre>

        <div class="php-output">
            <?php
                $name = "Alice";
                $a = 5;
                $b = 3;
                $sum = $a + $b;
                echo "Hello $name, 5 + 3 = $sum";
            ?>
        </div>
    </div>

    <div class="section">
        <h2>💡 Why Use PHP?</h2>
        <ul>
            <li>Simple and easy to learn</li>
            <li>Supports MySQL and other databases</li>
            <li>Enables dynamic web page creation</li>
            <li>Works well with HTML, CSS, and JavaScript</li>
            <li>Open-source and community-driven</li>
        </ul>
    </div>

    <footer>
        &copy; <?= date("Y") ?> PHP Overview Page. All rights reserved.
    </footer>
</div>

</body>
</html>
