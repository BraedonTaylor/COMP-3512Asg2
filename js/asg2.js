document.addEventListener("DOMContentLoaded", function () {

    const elementMaker = element => document.createElement(`${element}`);
    const $ = element => document.querySelector(`${element}`);
    const companiesAPI = 'http://localhost/comp-3512asg2/api-companies.php'; // Needs to be changed to our API
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

    /*
    * Helper method to retreive company information from storage or return an empty array.
    */
    function retrieveStorage() {
        return JSON.parse(localStorage.getItem('companies'))
            || [];
    }

    /*
    * Method to update local storage after the list of companies has been fetched.
    */
    function updateStorage(data) {
        localStorage.setItem('companies',
            JSON.stringify(data));
    }

    /*
    * After the list of companies has been filtered, this method repopulates the data once the filter
    * has been cleared.
    */
    function resetCompanyList(data) {
        companies.push(...data);
        companylist(data);
    }

    /*
    * Provided function that is triggered once the user has inputted at least two chars.
    */
    function displayMatches() {
        if (this.value.length >= 2) {
            const matches = findMatches(this.value, companies);
            companyList.innerHTML = "";
            matches.forEach(company => {
                buildEntry(company);
            });
        }
    }

    /*
    * Provided function that uses a regex to find matches in the list of companies based on user input.
    */
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

    /*
    * Function that builds the table with the information provided by the company-list API.
    * Relevant fields are populated, such as the logo, anchor tags for company name and company symbol,
    * as well as event listeners are added to the logo to magnify the image.
    */
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
    
    /*
    * Helper method to create and populate anchor tags.
    */
    function anchorMaker(s) {
        const anchor = elementMaker("a");
        anchor.setAttribute("href", `single-company.php?symbol=${s}`);
        anchor.classList.add("anchors");
        return anchor;
    }

    /*
    * Helper method to create a company logo.
    */
    function logoMaker(c) {
        const logo = elementMaker('img');
        logo.setAttribute('src', `./images/logos/${c.symbol}.svg`);
        logo.setAttribute(`alt`, `${c.name}`);
        logo.setAttribute(`class`, `clogo`)
        return logo;
    }
});