<?php 
include('../conf/conexao.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
    /* Estilo Base Estável */
    #sidebar {
        background-color: #0f172a; /* Azul escuro moderno */
        min-height: 100vh;
        width: 250px;
        padding: 20px 0;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1000;
        border-right: 1px solid #1e293b;
    }

    /* Cabeçalho */
    #sidebar h3 {
        color: #ffffff;
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 1px solid #334155;
        letter-spacing: 1px;
    }

    /* Itens do Menu */
    .nav-pills {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 0 15px;
    }

    .nav-link {
        color: #94a3b8;
        padding: 12px 15px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 0.95rem;
    }

    .nav-link i {
        width: 20px;
        text-align: center;
        font-size: 1rem;
    }

    /* Estados do Menu */
    .nav-link:hover {
        background-color: #1e293b;
        color: #e2e8f0;
    }

    .nav-link.active {
        background-color: #2563eb;
        color: white;
        font-weight: 500;
    }

    /* Rodapé */
    #sidebar hr {
        border-color: #334155;
        margin: 20px 15px;
    }

    .btn-danger {
        background-color: #dc2626;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 10px 15px;
        width: calc(100% - 30px);
        margin: 0 15px;
        display: block;
        text-align: center;
        font-weight: 500;
        transition: background-color 0.2s ease;
    }

    .btn-danger:hover {
        background-color: #b91c1c;
    }

    </style>
</head>
<body>

    <?php include('../includes/siderbar.php'); ?>

    <div id="content">
        <?php include_once("dashboard.php"); ?>
    </div>

    <script>
        document.querySelectorAll('#sidebar .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const page = this.getAttribute('data-page');
                fetch(page)
                    .then(res => res.text())
                    .then(html => {
                        const temp = document.createElement('div');
                        temp.innerHTML = html;
                        const novoConteudo = temp.querySelector('#content') || temp;
                        document.getElementById('content').innerHTML = novoConteudo.innerHTML;
                    });
            });
        });
    </script>

</body>
</html>
