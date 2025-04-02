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
            
            const resultsHTML = results.reduce((html, result) => {
                return html + (
                    `
                        <div class="item">
                            <a href="../pages/project-details.php?project-id=${result.idProject}" class="link-underline link-underline-opacity-0">${result.title}</a>
                        </div>
                    `
                )
            }, "");

            document.getElementById("results").innerHTML = resultsHTML
        }, 350);
    });
});