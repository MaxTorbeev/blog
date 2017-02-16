window.select2 = require("select2");

$(function() {

    function formatHints (hint) {
        if (!hint.id || typeof($(hint.element).data('option-hint')) != 'string' ) {
            return hint.text;
        } else {
            var $hint = $(
                '<span>' + hint.text + '</span>' +
                '<small class="select2-hint">' + $(hint.element).data('option-hint') +'</small>'
            );
            return $hint;
        }
    }

    $(".select2").select2({});

    $(".selectPreviewPhoto").select2({
        ajax: {
            url: window.location.origin + '/posts/api/photos/9',
            dataType: 'json',
            delay: 100,

            data: (params) => {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },

            processResults: (data, params) => {
                params.page = params.page || 1;

                return {
                    results: data,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        minimumInputLength: 0,
        escapeMarkup: (markup) => { return markup },
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
    });

    function formatRepo (repo) {
        if (repo.loading) return 'Загрузка';

        var markup = "<div class='select2-result-repository__title'>" + repo.original_name + "</div>";

        markup += '<img src="/' + repo.path + '/' + repo.thumbnail_filename + '" class="">';

        return markup;
    }

    function formatRepoSelection (repo) {
        return repo.full_name || repo.text;
    }
});

