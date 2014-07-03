    <h1 class="page-header">Contato</h1>
    <div class="row">
        <?php if(!isset($_POST['nome'])){ ?>
        
        <div class="col-sm-8">
            <p>Entre em contato conosco através do formulário abaixo.</p>
                <form role="form" method="POST" action="/contato">
	            <div class="row">
                        <div class="form-group col-lg-6">
                          <label for="input1">Nome</label>
                          <input type="text" name="nome" class="form-control" id="input1" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="input2">Email</label>
                          <input type="email" name="email" class="form-control" id="input2" required="required">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                          <label for="input3">Assunto</label>
                          <input type="text" name="assunto" class="form-control" id="input3" required="required">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                          <label for="input4">Mensagem</label>
                          <textarea name="mensagem" class="form-control" rows="6" id="input4" required="required"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Enviar</button>
                        </div>
                    </div>
                </form>
        </div>
        
        <?php }  else { ?>
        
        <div class="col-sm-8">
            <h4 class="text-success">Sua mensagem foi enviada com sucesso!</h4>
            
            <p>Segue abaixo os dados da mensagem enviada</p>
            <p><strong>Nome: </strong><?php echo $_POST['nome'];?></p>
            <p><strong>Email: </strong><?php echo $_POST['email'];?></p>
            <p><strong>Assunto: </strong><?php echo $_POST['assunto'];?></p>
            <p><strong>Mensagem: </strong><br /><?php echo nl2br($_POST['mensagem']);?></p>
            
        </div>
        
        <?php }?>
    </div>