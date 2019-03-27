<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
  
     <!-- Content Header (Page header) -->
     <section class="content">

            <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                            <div class="box box-primary">
                                <form role="form" id="importar-dados" method="POST" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Importe o arquivo de atualização de dados</label>
                                            <input type="file" id="arquivo" name="arquivo" accept=".xml">
                          
                                            <p class="help-block">Importe o arquivo CSV com os dados atualizados</p>
                                          </div> 
                                          <button type="submit" class="btn btn-success" >Atualizar</button>
                                    </div>
                                    
                                </form>
                            </div>
                    </div>
            </div>

    </section>
</div>