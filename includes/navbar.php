    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/home">Meu Site</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/home">Home</a>
                    </li>
                    <li><a href="/empresa">Empresa</a>
                    </li>
                    <li><a href="/produtos">Produtos</a>
                    </li>
                    <li><a href="/servicos">Serviços</a>
                    </li>
                    <li><a href="/contato">Contato</a>
                    </li>
                </ul>
                <div class="pull-right" style="margin-top: 8px;">
                    <form action="/busca" method="post" class="form-inline" role="form">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" name="busca" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="submit" value="Buscar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container -->
    </nav>

    <div class="container">