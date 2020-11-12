$(document).ready(function() {
 $('.datanasc').mask('00/00/0000');
 $('.CNS').mask('000 0000 0000 0000');
});

function fMasc(objeto,mascara) {
    obj=objeto
    masc=mascara
    setTimeout("fMascEx()",1)
  }
  
  function fMascEx() {
    obj.value=masc(obj.value)
  }
  function mCPF(cpf){
    cpf=cpf.replace(/\D/g,"")
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
    cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return cpf
  }
  
  
   