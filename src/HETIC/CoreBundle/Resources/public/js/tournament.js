
function init(data) {
    var onDemo = false;
    if (onDemo)
        var names = demo();
    else {
        var names = data;
        debugger;
        if(names)
            var isLoaded = true;
    }

    function demo() {
        var number = 6;
        var players = [];
        for (var i = 1; i <= number; i++)
            players.push(i);
        return players;
    }

    var joueurs = _.shuffle(names),
        participants = joueurs.length,
        step = Math.floor(participants / 2);
}
function getData(num) {
    var matches = [],
        knownBrackets = num + (num % 2),
        rounds = Math.log(knownBrackets) / Math.log(2) - 1,
        pls = [1, 2];
    for (var i = 0; i < rounds; i++)
        pls = nextLayer(pls);
    for (var y = 0; y < pls.length; y += 2) {
        var idx = pls[y] - 1,
            idx2 = pls[y + 1] - 1;
        var pl1 = joueurs[idx] ? joueurs[idx] : null;
        var pl2 = joueurs[idx2] ? joueurs[idx2] : null;
        matches.push([pl1, pl2]);
    }

    function nextLayer(pls) {
        var out = [],
            length = pls.length * 2 + 1;
        _.each(pls, function(a) {
            out.push(a);
            out.push(length - a);
        });
        return out;
    }
    return matches;
}

function getSaveData(num) {
    return {
        teams: getData(num),
        results: []
    };
}

function saveFn(data, userData) {
    /*var json = jQuery.toJSON(data)
        // $('#saveOutput').text('POST ' + userData + ' ' + json)
         You probably want to do something like this
        jQuery.ajax("rest/"+userData, {contentType: 'application/json',
                                      dataType: 'json',
                                      type: 'post',
                                      data: json})*/
}

function getPlayers() {
    var playersBDD = [];
    $.ajax({
        url: '/app_dev.php/getplayers',
        dataType: 'json',
        success: function(result) {
            debugger;
            playersBDD = result;
        },
        error: function(error) {
        }
    });
    console.log(playersBDD);
}

function render_fn(container, data, score, state) {
    switch (state) {
        case "empty-bye":
            container.append("Vide")
            return;
        case "empty-tbd":
            container.append("En attente")
            return;
        case "entry-no-score":
        case "entry-default-win":
        case "entry-complete":
            container.append(data);
            return;
    }
}

$(function() {
    $(document).ready(function() {
        $.ajax({
            url: '/app_dev.php/getplayers',
            dataType: 'json',
            success: function(result) {
                debugger;
                init(result);
            },
            error: function(error) {
            }
        })
        .done(function() {
            var container = $('#turnament');
            container.bracket({
                init: getSaveData(),
                save: saveFn,
                userData: "http://myapi",
                skipConsolationRound: true,
                disableToolbar: true,
                disableTeamEdit: true,
                decorator: {
                    edit: function() {},
                    render: render_fn
                }
            });
        });
    });

});
