
 export function fetchPost (url,bodyData) {
     return fetch(url, {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(bodyData),
    })
        .then((response) => response.json())
        .then((data) => {

            const returnVal = {
                status: 0,
                data: data
            };
            return returnVal;
        })
        .catch((error) => {
            console.error('Error:', error);
            const returnVal = {
                status: 1,
                data: error
            };
            return returnVal;
        });
}