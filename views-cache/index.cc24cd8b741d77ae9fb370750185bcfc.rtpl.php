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

   <!-- Info boxes -->
   <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="fa fa-laptop"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><b>Notebook</b></span>
          <span class="info-box-text">Solicitações</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-laptop"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><b>Notebook</b></span>
          <span class="info-box-text">Devoluções</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-laptop"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><b>Notebook</b></span>
          <span class="info-box-text">Disponíveis</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-laptop"></i></span>

        <div class="info-box-content ">
          <span class="info-box-text"><b>Notebook</b></span>
          <span class="info-box-text">Reservados</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="fa fa-desktop"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><b>Desktop</b></span>
          <span class="info-box-text">Solicitações</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-desktop"></i></span>

        <div class="info-box-content">
            <span class="info-box-text"><b>Desktop</b></span>
          <span class="info-box-text">Devoluções</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-desktop"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><b>Desktop</b></span>
          <span class="info-box-text">Disponíveis</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-desktop"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><b>Desktop</b></span>
          <span class="info-box-text">Reservado</span>
          <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->



  <!--  ############################ TABELA ########################### -->
 
    <div class="row">
      
      <div class="col-xs-12">
          <div class="box bg-gray">
            <div class="box-header bg-black">
              <h3 class="box-title">Solicitações de Emprestimo</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped bg-gray">
                  <thead>
                      <tr>
                        <th>Nome solicitante</th>
                        <th>Chamado</th>
                        <th>Unidade</th>
                        <th>Setor</th>
                        <th>Equipamento</th>
                        <th>Data do empréstimo</th>
                        <th>Data da devolução</th>
                        <th>Ação</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>Júlio Pragana</td>
                        <td>12457</td>
                        <td>Recife</td>
                        <td>TIC</td>
                        <td>Notebook</td>
                        <td>11/01/2019</td>
                        <td>19/01/2019</td>
                        <td>
                          <div class="btn-group bg-red"><button ><span class="fa fa-dashboard"></span></button></div> 
                        </td>
                      </tr> 
                  </tbody>
              </table>
            </div>
        </div>
   
    
    
      <div class="row">
        
        <div class="col-xs-12">
            <div class="box bg-gray">
              <div class="box-header bg-black">
                <h1 class="box-title">Controle de empréstimos</h1>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped bg-gray">
                    <thead>
                        <tr>
                          <th>Nome solicitante</th>
                          <th>Unidade</th>
                          <th>Setor</th>
                          <th>Equipamento</th>
                          <th>Data do empréstimo</th>
                          <th>Data da devolução</th>
                          <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr> -->
                    </tbody>
                </table>
              </div>
          </div>
      
        </section>  
</div> 





