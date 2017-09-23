function change (origin, select) {
    if (origin === 'hersteller') {
        $('#img_router_front').attr("src", "router_images/keinbild.jpg")
        $('#img_router_back').attr("src", "router_images/keinbild.jpg")
        $('#version')
            .attr('disabled', '')
            .material_select()
        $('#erstinstallation')
            .attr('disabled', '')
            .material_select()
        $('#entwicklungsstadium')
            .attr('disabled', '')
            .material_select()
        var modelle = []
        for (var i = 0; i < anzahl_hersteller; i++) {
            if ($(select).find('option:selected').html() == herstellername[i]) {
                var j = 0
                while (j < router_json.length) {
                    if (router_json[j].hersteller == herstellername[i]) {
                        modelle[j] = router_json[j].modell
                        if (j < router_json.length - 1) {
                            while (router_json[j].modell == router_json[j + 1].modell) {
                                if (j < router_json.length - 1) {
                                    j++
                                } else {
                                    break
                                }
                            }
                        }
                    }
                    j++
                }
            }
        }
        $('#modell').html("<option disabled selected value=''>Modell auswählen</option>")
        for (var modell in modelle) {
            var newOption = document.createElement('option')
            newOption.value = modelle[modell]
            newOption.innerHTML = modelle[modell]
            $('#modell').append(newOption)
        }
        $('#modell')
            .removeAttr('disabled')
            .material_select()
    }
    else if (origin === "modell") {
        $('#img_router_front').attr("src", "router_images/keinbild.jpg")
        $('#img_router_back').attr("src", "router_images/keinbild.jpg")
        $('#erstinstallation')
            .attr('disabled', '')
            .material_select()
        $('#entwicklungsstadium')
            .attr('disabled', '')
            .material_select()
        var versionen = []
        var i = 0
        while (i < router_json.length) {
            if (router_json[i].modell == $(select).val()) {
                versionen[i] = i + '|' + router_json[i].version
                if (i < router_json.length - 1) {
                    while (router_json[i].modell == router_json[i + 1].modell) {
                        if (i < router_json.length - 1) {
                            i++
                            versionen[i] = i + '|' + router_json[i].version
                        } else {
                            break
                        }
                    }
                }
            }
            i++
        }
        $('#version').html("<option disabled selected value=''>Modell auswählen</option>")
        for (var version in versionen) {
            var pair = versionen[version].split('|')
            var newOption = document.createElement('option')
            newOption.value = pair[0]
            newOption.innerHTML = pair[1]
            $('#version').append(newOption)
        }
        $('#version')
            .removeAttr('disabled')
            .material_select();
    }
    else if(origin === 'version') {
        var id = $('#version').val()
        $('#entwicklungsstadium')
            .attr('disabled', '')
            .material_select()
        $('#erstinstallation').html("<option disabled selected value=''>Firmware Erstinstallation?</option>")
        if(router_json[id].stablefactory === 1) {
            $('#erstinstallation').append('<option value="' + $(select).val() + 'J" data-value="yes">Ja</option>');
        }
        if(router_json[id].stablesysupgrade === 1) {
            $('#erstinstallation').append('<option value="' + $(select).val() + 'N" data-value="no">Nein</option>');
        }
        $('#erstinstallation').removeAttr('disabled')
        $('#erstinstallation').material_select()
        $('#img_router_front').attr("src", router_json[$(select).val()].imagefront)
        $('#img_router_back').attr("src", router_json[$(select).val()].imageback)
    }
    else if (origin === 'erstinstallation') {
        var stadium = $('#entwicklungsstadium')
        stadium.html("<option disabled value=''>Firmware Entwicklungsstadium?</option>")
        var id = $('#version').val()
        if (router_json[id].stablefactory == 1) {
            stadium.append("<option selected value='" + $(select).val() +"stable'>Stabil &#040;empfohlen&#041;</option>")
        }
        if (router_json[id].betafactory == 1) {
            stadium.append("<option value='" + $(select).val() +"beta'>Beta</option>")
        }
        if (router_json[id].experimentalfactory == 1) {
            stadium.append("<option value='" + $(select).val() +"exp'>Experimental</option>")
        }
        if (router_json[id].brokenfactory == 1) {
            stadium.append("<option value='" + $(select).val() +"broken'>Fehlerhaft</option>")
        }
        stadium.removeAttr('disabled')
        stadium.material_select()
    }
    else if (origin === 'entwicklungsstadium') {
        var id = 0
        var link = '#'
        var linkclass = ''
        if ($(select).val().lastIndexOf('Jbeta') != -1) {
            console.log('xxx')
            id = parseInt($(select).val().slice(0, $(select).val().length - 4))
            link = router_json[id].betafactorylink
            linkclass = 'btn-warning'
        }
        if ($(select).val().lastIndexOf('Jbroken') != -1) {
            id = parseInt($(select).val().slice(0, $(select).val().length - 6))
            link = router_json[id].brokenfactorylink
            linkclass = 'btn-danger'
        }
        if ($(select).val().lastIndexOf('Jexp') != -1) {
            id = parseInt($(select).val().slice(0, $(select).val().length - 3))
            link = router_json[id].experimentalfactorylink
            linkclass = 'btn-warning'
        }
        if ($(select).val().lastIndexOf('Jstable') != -1) {
            console.log("xxxx")
            id = parseInt($(select).val().slice(0, $(select).val().length - 6))
            link = router_json[id].stablefactorylink
            linkclass = 'btn-success'
        }
        if ($(select).val().lastIndexOf('Nbeta') != -1) {
            id = parseInt($(select).val().slice(0, $(select).val().length - 4))
            link = router_json[id].betasysupgradelink
            linkclass = 'btn-warning'
        }
        if ($(select).val().lastIndexOf('Nbroken') != -1) {
            id = parseInt($(select).val().slice(0, $(select).val().length - 6))
            link = router_json[id].brokensysupgradelink
            linkclass = 'btn-danger'
        }
        if ($(select).val().lastIndexOf('Nexp') != -1) {
            id = parseInt($(select).val().slice(0, $(select).val().length - 3))
            link = router_json[id].experimentalsysupgradelink
            linkclass = 'btn-warning'
        }
        if ($(select).val().lastIndexOf('Nstable') != -1) {
            id = parseInt($(select).val().slice(0, $(select).val().length - 6))
            link = router_json[id].stablesysupgradelink
            linkclass = 'btn-success'
        }
        $('#download').attr("href", link)
        $('#download').removeAttr('disabled')
    }
    else if (origin === "stadtteil") {
        location.href = "firmware.php?id=" + $(select).val()
    }
}

$(function () {
    $('select').material_select();
})
