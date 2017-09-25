$(document).ready(function(){
  $('#novoCadastro #telefone').mask('(00) 0000-00000', {placeholder: "(__) ____-_____", selectOnFocus: true, clearIfNotMatch: true});
  $('#editarCad #telefone').mask('(00) 0000-00000', {placeholder: "(__) ____-_____", selectOnFocus: true, clearIfNotMatch: true});
});