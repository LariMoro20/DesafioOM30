<style>
  .img-pac{
    max-width: 70%;
  }
  .td-img{
   max-width: 57px;
  }
 .cancelbtn{
  width: 100%;
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
      <th scope="col">CNS</th>
      <th scope="col">Data Nasc.</th>
      <th scope="col">Nome da mãe</th>
      <th scope="col">Endereço</th>
      <th scope="col">Remover</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach ($pacientes as $pac) { ?>
	   
    <tr idPac='<?=$pac->Id ?>'>
      <td class='td-img'><img class='img-pac' src='<?= BASE_URL.$pac->foto ?>' ></td>
      <td class='td-nome'><?= $pac->nome ?></td>
      <td class='td-CPF'><?= $pac->CPF ?></td>
      <td class='td-CNS'><?= $pac->CNS ?></td>
      <td class='td-data_nasc'><?= $pac->data_nasc ?></td>
      <td class='td-nome_mae'><?= $pac->nome_mae ?></td>
      <td class='td-endereco'><?= $pac->endereco ?></td>
      <td><a class='btnremovepac' idPac='<?=$pac->Id ?>' href="#."><i class="fa fa-window-close"></i></a></td>
      <td><a class='btneditpac' href="#." ><i class="fa fa-pencil-square-o"></i></a></td>

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
      <form  id="addPaciente" class='addPaciente' action='#' method='post'  enctype='multipart/form-data' >

        <div class="modal-body">
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
              
            </div>
            
            
        </div>
        <div class="modal-footer">
                <input type="submit" class="form-control btn btn-success" id="submit" value='Enviar'>
                <a href='#' data-dismiss="modal" class="cancelbtn btn btn-secondary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editar Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  id="editPaciente" class='editPaciente' action='#' method='post'  enctype='multipart/form-data' >
      <input type="hidden" class="form-control" name='Id' id="IdInput">

        <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="Nome">Nome</label>
                <input type="text" class="form-control" name='nome' id="nomeInput" placeholder="Nome do Paciente" required>
              </div>
              <div class="form-group col-md-6">
                <label for="data_nasc">Data de nascimento</label>
                <input type="text" name='data_nasc' class="form-control" id="data_nascInput" placeholder="Data de nascimento" required>
              </div>
              <div class="form-group col-md-6">
                <label for="CPF">CPF</label>
                <input type="text" name='CPF' class="form-control" id="CPFInput" placeholder="CPF" required>
              </div>
              <div class="form-group col-md-6">
                <label for="CNS">CNS</label>
                <input type="text" name='CNS' class="form-control" id="CNSInput" placeholder="CNS" required>
              </div>
              <div class="form-group col-md-12">
                <label for="nome_mae">Nome da mãe</label>
                <input type="text" name='nome_mae' class="form-control" id="nome_maeInput" placeholder="Nome da mãe" required>
              </div>
              <div class="form-group col-md-12">
                <label for="endereco">Endereço</label> 
                <input type="text" required name='endereco' class="form-control" id="enderecoInput" placeholder="Endereço" required>
              </div>
              <div class="form-group col-md-12 text-center">
                <label for="foto">Foto do paciente</label>
                <input type="hidden" name="oldFoto" id="fotoInputHiden" >
                <input type="file" required name='foto' class="form-control" id="fotoInput" placeholder="Foto do paciente"  onchange="document.getElementById('imgspace2').src = window.URL.createObjectURL(this.files[0])">
                <img id="imgspace2"  width="200" height="200" />
              </div>
              
            </div>
            
            
        </div>
        <div class="modal-footer">
                <input type="submit" class="form-control btn btn-success" id="submit" value='Enviar'>
                <a href='#' data-dismiss="modal" class="cancelbtn btn btn-secondary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>



</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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


  $('.btneditpac').on( 'click', function (e) { 
    var element = $(this);
    let id=element.closest('tr').attr('idPac');

    let nome=       element.closest('tr').find('td.td-nome').text();
    let cns=        element.closest('tr').find('td.td-CNS').text();
    let cpf=        element.closest('tr').find('td.td-CPF').text();
    let datanasc=   element.closest('tr').find('td.td-data_nasc').text();
    let mae=        element.closest('tr').find('td.td-nome_mae').text();
    let endereco=   element.closest('tr').find('td.td-endereco').text();
    let image=      element.closest('tr').find('td.td-img img').attr("src");

    $('#IdInput').val(id);
    $('#nomeInput').val(nome);
    $('#data_nascInput').val(datanasc);
    $('#CPFInput').val(cpf);
    $('#CNSInput').val(cns);
    $('#nome_maeInput').val(mae);
    $('#enderecoInput').val(endereco);
    $('#fotoInputHiden').val(image);
    $('#imgspace2').attr("src",image);
    


    $('#editModal').modal('show')
    
    
  })
</script>

</body>
</html>