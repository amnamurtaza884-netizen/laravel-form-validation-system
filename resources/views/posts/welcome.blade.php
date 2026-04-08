<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }

        h1 {
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a:hover {
            background: #218838;
        }
    </style>
</head>

<body>

    <div class="box">
        <h1>Welcome to My Laravel Project 🎉</h1>
        <p>Click below to manage your posts</p>

        <br>

        <a href="/posts">Go to Posts</a>
    </div>

</body>
</html>