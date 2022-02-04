
<div class="container">
    <div class="container-reponse">
        <div class="reponse" >A. La Roumanie</div>
        <div class="reponse">B. La Moldavie</div>
        <div class="reponse">C. Le Bhoutan</div>
        <div class="reponse">D. Andorre</div>
    </div>
    
    <div id="valider">
        <button>
            Valider
        </button>
    </div>

</div>

<style>

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.container-reponse {
    width: 100%;
    bottom: 0;
    display: grid;
    grid-template-columns: 45% 45%;
    margin: 8px;
    margin-left: 5%;
}

.reponse {
    text-align: center;
    border: 1px solid coral;
    border-radius: 10px;
    background-color: navy;
    margin: 4px;
}

#valider {
    display: none;
}

</style>

<script type="text/javascript">

    var boutonReponseSelected
    var idSelected

    var valider = document.getElementById('valider')
    valider.addEventListener('click', () => {
        boutonReponseSelected.style.backgroundColor = "green"
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "coral"
        }, 100)
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "green"
        }, 200)
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "coral"
        }, 300)
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "green"
        }, 400)
    })

    var liste = document.getElementsByClassName('reponse')
    for(let i = 0; i < liste.length; i++) {
        liste[i].addEventListener("click", () => {
            if (boutonReponseSelected) {
                boutonReponseSelected.style.backgroundColor = "navy"
            }
            boutonReponseSelected = liste[i];
            idSelected = i;
            boutonReponseSelected.style.backgroundColor = "coral";
            valider.style.display = "block";
        })
    }

    

</script>