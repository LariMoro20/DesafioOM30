<style>
  .img-pac{
    max-width: 70%;
  }
  .td-img{
   max-width: 57px;
  }
 
  </style>
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
	<h1>Lista de pacientes!</h1>
</div>
<div class="col-md-12">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
  Cadastrar
</button>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Data Nasc.</th>
      <th scope="col">Remover</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach ($pacientes as $pac) { ?>
	   
    <tr>
      <td class='td-img'><img class='img-pac' src='<?= BASE_URL.$pac->foto ?>' ></td>
      <td><?= $pac->nome ?></td>
      <td><?= $pac->CPF ?></td>
      <td><?= $pac->data_nasc ?></td>
      <td><a class='btnremovepac' idPac='<?=$pac->Id  ?>' href="#."><i class="fa fa-window-close"></i></a></td>
      <td><a class='btneditpac' idPac='<?=$pac->Id  ?>' href="#."><i class="fa fa-pencil-square-o"></i></a></td>

    </tr>
   <?php } ?>
  </tbody>
</table>





<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Adicionar Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form  id="addPaciente" class='addPaciente' action='#' method='post'  enctype='multipart/form-data' >
          <div class="row">
            <div class="form-group col-md-6">
              <label for="Nome">Nome</label>
              <input type="text" class="form-control" name='nome' id="Nome" placeholder="Nome do Paciente" required>
            </div>
            <div class="form-group col-md-6">
              <label for="data_nasc">Data de nascimento</label>
              <input type="text" name='data_nasc' class="form-control" id="data_nasc" placeholder="Data de nascimento" required>
            </div>
            <div class="form-group col-md-6">
              <label for="CPF">CPF</label>
              <input type="text" name='CPF' class="form-control" id="CPF" placeholder="CPF" required>
            </div>
            <div class="form-group col-md-6">
              <label for="CNS">CNS</label>
              <input type="text" name='CNS' class="form-control" id="CNS" placeholder="CNS" required>
            </div>
            <div class="form-group col-md-12">
              <label for="nome_mae">Nome da mãe</label>
              <input type="text" name='nome_mae' class="form-control" id="nome_mae" placeholder="Nome da mãe" required>
            </div>
            <div class="form-group col-md-12">
              <label for="endereco">Endereço</label>
              <input type="text" required name='endereco' class="form-control" id="endereco" placeholder="Endereço" required>
            </div>
            <div class="form-group col-md-12 text-center">
              <label for="foto">Foto do paciente</label>
              <input type="file" required name='foto' class="form-control" id="foto" placeholder="Foto do paciente"  onchange="document.getElementById('imgspace').src = window.URL.createObjectURL(this.files[0])">
              <img id="imgspace"  width="200" height="200" />
            </div>
            <div class="form-group col-md-12 text-center">
              <input type="submit" class="form-control" id="submit" value='Enviar'>
            </div>
          </div>
          
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>
</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>


<script>
 $('form#addPaciente').on( 'submit', function (e) { 
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: '<?= BASE_URL ?>landpage/addPaciente',
        type: "POST",
        processData: false,
        contentType: false,
        data: formData,
        success: function(data) {
          data=JSON.parse(data);
          $.confirm({
            title: 'Adicionado!',
            content: data.msg,
            buttons: {
              OK: function () {
                location.reload(); 
              }
            }  
          });
        },
        error:function(data) {
          $.confirm({
            title: 'Houve um erro!',
            content: data.msg,
            buttons: {
              OK: function () {
                location.reload(); 
              }
            }  
          });
        }
    });
 });

 $('.btnremovepac').on( 'click', function (e) { 
      e.preventDefault();
      var element = $(this);
        let id=element.attr('idPac');
        $.confirm({
          title: 'Remover item!',
          content: 'Deseja realmente deletar este paciente?',
          buttons: {
              Sim: function () {
                $.ajax({
                      type: "POST",
                      url: "<?= BASE_URL ?>landpage/deletePaciente",
                      data: {id:id},
                      success: function(msg){
                        element.closest('tr').remove();
                      }
                  });
              },
              cancelar: function () {},
          }
        });
  });
</script>

</body>
</html>