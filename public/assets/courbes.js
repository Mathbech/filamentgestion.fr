$(function () {
    let budget = {
        labels: ["Dépenses", "Recettes"],
        datasets: [{
            data: [50, 100 ],
            backgroundColor: [
                'rgba(255, 0, 0, 1)',
                'rgba(0, 255, 0, 1)'
            ],
            borderColor: [
                'rgba(255, 0, 0, 1)',
                'rgba(0, 255, 0, 1)'
            ],
            borderWidth: 1,
            hoverOffset: 4
        }]
    }

    var doughnutPieOptions = {
        responsive: true,
        animation: {
            animateScale: true,
            animateRotate: true
        }
    };


    if ($("#comptes").length) {
        var comptes = $("#comptes").get(0).getContext("2d");

        var config = new Chart(comptes, {
            type: 'doughnut',
            data: budget,
            options: doughnutPieOptions
        });
    }

});
