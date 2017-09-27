// Make sure the DOM elements are loaded and accounted for
$(document).ready(function () {

    // Match to Bootstraps data-toggle for the modal
    // and attach an onclick event handler
    $('div[data-toggle="modal"]').on('click', function (e) {

        // From the clicked element, get the data-target arrtibute
        // which BS3 uses to determine the target modal
        var target_modal = $(e.currentTarget).data('target');
        // also get the remote content's URL
        var remote_content = e.currentTarget.href;

        // Find the target modal in the DOM
        var modal = $(target_modal);
        // Find the modal's <div class="modal-body"> so we can populate it
        var modalBody = $(target_modal + ' .modal-body');

        // Capture BS3's show.bs.modal which is fires
        // immediately when, you guessed it, the show instance method
        // for the modal is called
        modal.on('show.bs.modal', function () {
            // use your remote content URL to load the modal body
            modalBody.load(remote_content);
        }).modal();
        // and show the modal

        // Now return a false (negating the link action) to prevent Bootstrap's JS 3.1.1
        // from throwing a 'preventDefault' error due to us overriding the anchor usage.
        return false;
    });
});

var StackedModalNamespace = StackedModalNamespace || (function () {
    var _modalObjectsStack = [];
    return {
        modalStack: function () {
            return _modalObjectsStack;
        },
        currentTop: function () {
            var topModal = null;
            if (StackedModalNamespace.modalStack().length) {
                topModal = StackedModalNamespace.modalStack()[StackedModalNamespace.modalStack().length - 1];
            }
            return topModal;
        }
    };
}());

// http://stackoverflow.com/a/13992290/260665 difference between $.fn.extend and $.extend
jQuery.fn.extend({
    // https://api.jquery.com/jquery.fn.extend/
    showStackedModal: function () {
        var topModal = StackedModalNamespace.currentTop();
        StackedModalNamespace.modalStack().push(this);
        this.off('hidden.bs.modal').on('hidden.bs.modal', function () { // Subscription to the hide event
            var currentTop = StackedModalNamespace.currentTop();
            if ($(this).is(currentTop)) {
                // 4. Unwinding - If user has dismissed the top most modal we need to remove it form the stack and display the now new top modal (which happens in point 3 below)
                StackedModalNamespace.modalStack().pop();
            }
            var newTop = StackedModalNamespace.currentTop();
            if (newTop) {
                // 3. Display the new top modal (since the existing modal would have been hidden by point 2 now)
                newTop.modal('show');
            }
        });
        if (topModal) {
            // 2. If some modal is displayed, lets hide it
            topModal.modal('hide');
        } else {
            // 1. If no modal is displayed, just display the modal
            this.modal('show');
        }
    }
});

$(".avisos").on('click', function() {
  $("#avisos").showStackedModal();
});

$(".addAvisos").on('click', function() {
  $("#addAviso").showStackedModal();
});

$(".cadastros").on('click', function() {
  $("#clientes").showStackedModal();
});

$(".allPedidos").on('click', function() {
  $("#todosPedidos").showStackedModal();
});

$(".fidelid").on('click', function() {
  $("#fidelidade").showStackedModal();
});

$(".editar").on('click', function() {
  $("#editar").showStackedModal();
});

$(".pedido").on('click', function() {
  $("#pedidoNew").showStackedModal();
});

$(".abaGratis").on('click', function() {
  $("#abaraGratis").showStackedModal();
});

$(".detalhes").on('click', function() {
  $("#detalhes").showStackedModal();
});

$(".editarAviso").on('click', function() {
  $("#editar").showStackedModal();
});

$(".newCadastro").on('click', function() {
  $("#novoCadastro").showStackedModal();
});

$(".esqueciSenha").on('click', function() {
  $("#recuperarSenha").showStackedModal();
});