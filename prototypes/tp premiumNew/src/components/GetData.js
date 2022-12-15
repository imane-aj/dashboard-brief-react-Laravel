import React, { Component } from "react";
import axios from "axios";

export default class GetData extends Component {
  getData = ()=>{
    axios.get('http://localhost:8000/api/task')
    .then((res => {
      let data =this.props.data
      this.setState({
        
      })
    }))
  }

  componentDidMount(){
    this.getData()
  }


  render() {
    return (
      <div className="mt-5">
        <table className="table mt-5">
          <thead>
            <tr>
              <th scope="col">Task</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            {this.state.getData.map((task) => (
              <tr>
                <td>{task.name}</td>
                <td>
                  <button className="btn btn-danger">
                    Delete
                  </button>
                  <button className="btn btn-warning">Edit</button>
                </td>
              </tr>
             ))} 
          </tbody>
        </table>
      </div>
    );
  }
}
