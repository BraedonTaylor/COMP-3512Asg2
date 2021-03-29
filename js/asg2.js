document.addEventListener("DOMContentLoaded", function () {

    const elementMaker = element => document.createElement(`${element}`);
    const $ = element => document.querySelector(`${element}`);
    const companiesAPI = 'https://www.randyconnolly.com/funwebdev/3rd/api/stocks/companies.php'; // Needs to be changed to our API
    let companies = [];
    const searchBox = $('.search');
    const companyList = $('#companyList');
    

    /*
    * The first fetch based on the user's selection of a company in the list of comanies. The fetched information is stored in the browser after being fetched once.
    * Once the data has been retrieved, the information boxes are created and populated.
    */
    if (localStorage.getItem("companies") === null) {
        fetch(companiesAPI)
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Fetch failed");
                }
            })
            .then(data => {
                companies.push(...data);
                companylist(data)
                updateStorage(data);
            })
            .catch(error => console.error(error));
    } else {
        data = retrieveStorage();
        resetCompanyList(data);
    }


    /*
    * Event Listener for filtering the list of companies based on user's input.
    * Also, the event listener for clearing the filter on the list of companies.
    */
    searchBox.addEventListener('keyup', displayMatches);

    $('#clearButton').addEventListener('click', () => {
        $(`#companyList`).innerHTML = "";
        $(`.search`).value = "";
        data = retrieveStorage();
        resetCompanyList(data);
    });

    function retrieveStorage() {
        return JSON.parse(localStorage.getItem('companies'))
            || [];
    }

    function updateStorage(data) {
        localStorage.setItem('companies',
            JSON.stringify(data));
    }

    function resetCompanyList() {
        companies.push(...data);
        companylist(data);
    }

    function displayMatches() {
        if (this.value.length >= 2) {
            const matches = findMatches(this.value, companies);
            companyList.innerHTML = "";
            matches.forEach(company => {
                buildEntry(company);
            });
        }
    }

    function findMatches(wordToMatch, companies) {
        return companies.filter(obj => {
            const regex = new RegExp(wordToMatch, 'gi');
            return obj.name.match(regex);
        });
    }

    /*
    * Once the data has been received (or pulled from storage), populate each box for the default view.
    */
    function companylist(data) {
        data.sort((a, b) => {
            return a.symbol.toLowerCase() < b.symbol.toLowerCase() ? -1 : 1;
        });
        for (let c of data) {
            buildEntry(c);
        }
        companyList.style.display = "grid";
    }

    function buildEntry(c) {
        const logo = logoMaker(c)
        companyList.appendChild(logo);
        const name = anchorMaker(c.symbol)
        name.textContent = `${c.name}`;
        companyList.appendChild(name);
        const symbol = anchorMaker(c.symbol);
        symbol.textContent = `${c.symbol}`
        companyList.appendChild(symbol);

        logo.addEventListener("mouseenter", (e) => {
            e.stopPropagation();
            console.log(e.target.nodeName)
            if (e.target.nodeName == "IMG") {
                const magDiv = $("#magnify");
                const magImg = $("#magImage");
                magImg.setAttribute("src", e.target.src)
                magDiv.style.display = "block";
            }
        });
    
        logo.addEventListener("mousemove", (e) => {
            if (e.target.nodeName == "IMG") {
            const magDiv = $("#magnify");
            magDiv.style.left = e.clientX + 10 +"px";
            magDiv.style.top = e.clientY + 10 +"px";
            }
        });
    
        logo.addEventListener("mouseleave", (e) => {
            if (e.target.nodeName == "IMG") {
                $("#magImage").setAttribute("src", "");
                $("#magnify").style.display = "none";
            }
        });
    }
    
    function anchorMaker(s) {
        const anchor = elementMaker("a");
        anchor.setAttribute("href", `single-company.php?symbol=${s}`);
        anchor.className = "anchors";
        return anchor;
    }

    function logoMaker(c) {
        const logo = elementMaker('img');
        logo.setAttribute('src', `./logos/${c.symbol}.svg`);
        logo.setAttribute(`alt`, `${c.name}`);
        logo.setAttribute(`class`, `clogo`)
        return logo;
    }

});