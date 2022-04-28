<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>TaverneBDJ</title>


        <style>
            .format{
                vertical-align: baseline;
                background-color: #F6F3E4;
                width: max-content;
                padding:60px 80px;
                margin: 20% auto;
                border-style: double;
                border-width: 8px;
            }
            .body {
                text-align: center;
                background-image: url("https://attachments.office.net/owa/anais.eudes%40epfedu.fr/service.svc/s/GetAttachmentThumbnail?id=AAMkAGEyYzU0OTk3LTQ4ZWItNGU3Ny1iM2ZmLTIzNWU4NmZmMTZhZABGAAAAAACb66IXencwQ5LjClE4UtkwBwCQmLt8635%2FQaCkkRS0DASiAAAAAAEPAACQmLt8635%2FQaCkkRS0DASiAAGM59ZoAAABEgAQAIb4R59eH7FFhVMIorM8HHE%3D&thumbnailType=2&token=eyJhbGciOiJSUzI1NiIsImtpZCI6IkZBRDY1NDI2MkM2QUYyOTYxQUExRThDQUI3OEZGMUIyNzBFNzA3RTkiLCJ0eXAiOiJKV1QiLCJ4NXQiOiItdFpVSml4cThwWWFvZWpLdDRfeHNuRG5CLWsifQ.eyJvcmlnaW4iOiJodHRwczovL291dGxvb2sub2ZmaWNlLmNvbSIsInVjIjoiODEwYmUwZDU0MzliNDg0Yjk0YWJmYWVmNWM2NDlmMjciLCJzaWduaW5fc3RhdGUiOiJbXCJrbXNpXCJdIiwidmVyIjoiRXhjaGFuZ2UuQ2FsbGJhY2suVjEiLCJhcHBjdHhzZW5kZXIiOiJPd2FEb3dubG9hZEAwN2M3MjUyMC1lNjQ1LTQ2NzktOGY1NS1kYzYxMWM5NzVhMDIiLCJpc3NyaW5nIjoiV1ciLCJhcHBjdHgiOiJ7XCJtc2V4Y2hwcm90XCI6XCJvd2FcIixcInB1aWRcIjpcIjExNTM4MDExMTc2MDU2MDgwMTBcIixcInNjb3BlXCI6XCJPd2FEb3dubG9hZFwiLFwib2lkXCI6XCIyNDRiMjQ0Zi04ZDc0LTQxNzktYmQyYy1lN2QxZDg2ZGExNGFcIixcInByaW1hcnlzaWRcIjpcIlMtMS01LTIxLTM2NTMyMjQ2OS0zOTYxOTczMjYwLTM4MjEzNzYwNjAtNzA5NTE0OVwifSIsIm5iZiI6MTY1MTEwMjkwNiwiZXhwIjoxNjUxMTAzNTA2LCJpc3MiOiIwMDAwMDAwMi0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDBAMDdjNzI1MjAtZTY0NS00Njc5LThmNTUtZGM2MTFjOTc1YTAyIiwiYXVkIjoiMDAwMDAwMDItMDAwMC0wZmYxLWNlMDAtMDAwMDAwMDAwMDAwL2F0dGFjaG1lbnRzLm9mZmljZS5uZXRAMDdjNzI1MjAtZTY0NS00Njc5LThmNTUtZGM2MTFjOTc1YTAyIiwiaGFwcCI6Im93YSJ9.b3HPG4pXXq95hrJnwVGLULu23_87BgP9xmuC4KeXMtv3dr_Y37Zu1qC7UntyP-_iio2gaqSNQ3kh2yJ6va_g7rdqGHjWfmWGvQZ4CVNnqqI1csuNj1HPZ6XULdKbV2a5G9xFCitf_F39OH6bG2dZLeBv75Kpz1mh2hx3LfXKBpVE8AAsutKQ7I3FVDIpe0B9PlGjGhsdSDtQDYQPbOSOwkeugjn_pZibhfCukAyn4x638pKyXVWFujAqsx5K7fha8Ex-0Geo7jmRyUAXf02oKjTjmFo208ZCv_91cV8GeK0oEuDiAgAlPk2ojun-1-2SGKlaDmqrIIAnbfXfDKOqsg&X-OWA-CANARY=eq1wCNKqjEOUOo5hAXnDuKCh9IunKNoYD5BUOwYZzJNJ9-Xt1NO2n8u7g7sISHXKbSij9Ta6-zE.&owa=outlook.office.com&scriptVer=20220408004.13&animation=true");
                background-position: top left, 0px 0px;
        </style>
    </head>
    <body class='body'>
        <div class='format'>
            <h1>TavernBDJ</h1>
            <p class = 'Parableu'> Saisissez votre mot de passe </p>


            <form method="post">
                <input type="text" name="mdp" id="mdp">
                <input type="submit" name="formsend" id=formsend">
            </form>
            <?php
            if (isset($_POST["formsend"])) {
                if ($_POST["mdp"] === "hello") {
                    echo "very very good";
                    header("Location: vue_admin.php");
                    die();
                } else {
                    echo "Mot de passe incorrect";
                }
            }
            ?>



        </div>
    </body>
