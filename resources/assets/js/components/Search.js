import React, { Component } from 'react';
import ReactDOM from 'react-dom';


export default class Search extends Component {
    render() {
        return (

            <div>
            

            </div>
        
        );
    }
}


if (document.getElementById('searchArea')) {
    ReactDOM.render(<Search />, document.getElementById('searchArea'));
}
