import React, { Component } from 'react';
import { render } from 'react-dom';
import {getTableContent} from "./api/table_api";

class TableComp extends Component {
    constructor(props) {
        super(props);
        this.state = {
            error: null,
            isLoaded: false,
            items: []
        };
    }

    componentDidMount() {
        getTableContent()
            .then((result) => {
                this.setState({
                    isLoaded: true,
                    items: result
                })
            });
    }

    render() {
        const {error, isLoaded, items} = this.state;
        if (error) {
            return <div>Error: {error.message}</div>;
        } else if (!isLoaded) {
            return <div>Loading...</div>;
        } else {
            return (
                <table className="table">
                    <thead>
                    <tr>
                        <th>Universiteto pavadinimas</th>
                        <th>Vardas Pavardė</th>
                        <th>Diskrečioji matematika</th>
                        <th>Objektinis programavimas</th>
                        <th>Filosofija</th>
                        <th>Anglų k.</th>
                        <th>Projektų valdymas</th>
                    </tr>
                    </thead>
                    <tbody>
                    {Object.keys(items).map((item, index) => {
                        return (
                            <tr key={index}>
                                <td>{items[item].university_name}</td>
                                <td>{items[item].full_name}</td>
                                <td>{items[item].discrete_mathematics.avg_mark}</td>
                                <td>{items[item].object_oriented_programming.avg_mark}</td>
                                <td>{items[item].philosophy.avg_mark}</td>
                                <td>{items[item].english.avg_mark}</td>
                                <td>{items[item].project_management.avg_mark}</td>
                            </tr>
                        )
                    })
                    }
                    </tbody>
                </table>
            );
        }
    }
}

render(<TableComp/>, document.getElementById('table-div'));