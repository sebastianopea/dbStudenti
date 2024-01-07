<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            margin-left: 10px;
        }

        .column {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        input, button{
            padding-left: 5px;
            padding-top: 1px;
            margin-left: 10px;
            margin-top: 5px;
        }
        h2{
            margin-left: 10px;
            margin-top: 5px;
        }

    </style>
</head>
<body>
<h1 style="text-align: center; color: red">DATABSE STUDENTI</h1>
<h2>nuovo studente</h2>
<form action="insert-delete.php" method="post">
    <input type="text" name="nome" placeholder="Nome"><br>
    <input type="text" name="cognome" placeholder="cognome"><br>
    <input type="text" name="classe" placeholder="classe"><br>
    <input type="submit" value="inserisci">
</form>
    <h2>Elenco studenti</h2>
    <table>
        <?php foreach ($studenti as $studente):?>
            <tr>
                <td class="column"><?=$studente['nome']?></td>
                <td class="column"><?=$studente['cognome']?></td>
                <td class="column"><?=$studente['classe']?></td>
                <td><button><a href="insert-delete.php?action=delete&id=<?=$studente['id']?>"><i class="icon icon-delete"></i></a></button></td>
                <form action="edit.php" method="post">
                    <td><input type="hidden" name="id" value=<?=$studente['id']?>></td>
                    <td><input type="text" name="nuovoNome" placeholder="nuovo nome"></td>
                    <td><input type="text" name="nuovoCognome" placeholder="nuovo cognome"></td>
                    <td><input type="text" name="nuovaClasse" placeholder="nuova classe"></td>
                    <td><button type="submit"><i class="icon icon-edit"></i></button></td>
                </form>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>