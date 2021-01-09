/**
 *@return {Promise<Response>}
 */
export function getTableContent() {
    return fetch('/fetchStudentData', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
        .then(response => {
            return response.json();
        });
}