<?php $estilo = $_SESSION["tema"] ?? 'oscuro'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="css/global/style.css">
    <link rel="stylesheet" href="css/ordenador/style.css">
    <link rel="stylesheet" href="css/tablet/style.css">
    <link rel="stylesheet" href="css/movil/style.css">
    <link rel="stylesheet" href="css/global/<?= $css ?>.css">
    <link rel="stylesheet" href="css/ordenador/<?= $css ?>.css">
    <link rel="stylesheet" href="css/tablet/<?= $css ?>.css">
    <link rel="stylesheet" href="css/movil/<?= $css ?>.css">
    <link rel="stylesheet" href="css/modos-alternativos/<?= $estilo ?>.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php if($impresion): ?>
        <link rel="stylesheet" href="css/impresion/style.css" media="print">
        <link rel="stylesheet" href="css/impresion/<?= $css ?>.css" media="print">
    <?php endif; ?>
    <?php if($dialogos): ?>
        <script src="javascript/common.js"></script>
        <script src="javascript/dialogos.js"></script>
        <script src="javascript/<?= $pagina ?>.js"></script>
    <?php endif; ?>
</head>
