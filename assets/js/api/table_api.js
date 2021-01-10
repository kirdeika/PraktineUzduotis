/**
 *@return {Promise<Response>}
 */
export function getTableContent() {                 //Creating component for React
    return fetch('/fetchStudentData', {     //Using regular fetch call to send our request to /fetchStudentData endpoint
        method: 'POST',                             //Using POST method, because endpoint only accepts that
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
        .then(response => {
            return response.json();
        });
}