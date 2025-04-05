function search (query) {
    return fetch("../php/projects/search-projects.php?" + new URLSearchParams({
        query,
    })).then(r => r.json())
}

window.addEventListener("load", () => {
    let timeout = null;
    
    const searchbarEl = document.getElementById("query");
    searchbarEl.addEventListener("keyup", (event) => {
        const query = event.target.value; 

        if (timeout != null) {
            clearTimeout(timeout);
        }
        timeout = setTimeout(async () => {
            console.log(event.target.value)
            timeout = null;
            const results = await search(query);
            // console.log(results);
            
            var resultsHTML = '';
            results.forEach((r) => {
                resultsHTML += (
                    `
                        <div class="item">
                            <a href="../pages/project-details.php?id=${r.idProject}" class="link-underline link-underline-opacity-0">${r.title}</a>
                        </div>
                    `
                )
            })
            // console.log(resultsHTML);

            document.getElementById("results").innerHTML = resultsHTML
        }, 350);
    });
});

// mostra e nasconde i risultati della searchbar
document.addEventListener('DOMContentLoaded', () => {
    var searchInput = document.querySelector('#query');
    var results = document.querySelector('#results');

    searchInput.addEventListener('input', function () {
        if (this.value.trim() !== '') {
            results.style.display = 'block'; // quando si fa click fuori dal container dei risultati, essi vengono nwscosti
        } else {
            results.style.display = 'none'; // quando si clicca sull'input, i risultati vengono di muovo mostrati
        }
    });

    document.addEventListener('click', function (event) { // quando si fa click fuori adl container dei risultati, essi vengono nascosti
        if (!searchInput.contains(event.target) && !results.contains(event.target)) {
            results.style.display = 'none';
        }
    });

    searchInput.addEventListener('focus', function () { // se l'input ha del testo e viene selezionato, mostra i risultati
        if (this.value.trim() !== '') {
            results.style.display = 'block';
        }
    });
});
