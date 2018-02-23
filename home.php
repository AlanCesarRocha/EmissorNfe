<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="Pt-br">
    <meta charset="Utf-8">
    <head>
        <title>NF-e</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <!--Pills do menu da página-->
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#home"><img src="./imagens/man-user.png"> Fornecedor </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu1"><img src="./imagens/man-user.png"> Cliente </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu2"><img src="./imagens/shopping-list.png"> Pedidos </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active container" id="home">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <form style="margin-top: 20px" action="control.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="CNPJ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="CPF">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="IdEstrangeiro">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome fantasia">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="IndIEDset">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="IE">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="ISUF">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="IM">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container" id="menu1">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <form style="margin-top: 20px" action="control.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="CNPJ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="CPF">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="IdEstrangeiro">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome fantasia">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="IndIEDset">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="IE">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="ISUF">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="IM">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container" id="menu2">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <form style="margin-top: 20px" action="control.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Número do item">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Código do produto">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Cean">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome do produto">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Ncm">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Exitpi">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Cfop">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Ucom">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Qcom">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Uncom">
                                </div>     
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Produto">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="CeanTrib">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Utrib">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Qtrib">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="UnTrib">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Frete">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Seguro">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Desconto">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Outros">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Total">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Pedido">
                                </div>
                                <div class="form-group">
                                    <input type="number" min="0" max="9999" class="form-control" placeholder="Número de itens ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nfci">
                                </div>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-success btn-sm">Gerar pedido</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Fim do Pills-->
    </body>
</html>
