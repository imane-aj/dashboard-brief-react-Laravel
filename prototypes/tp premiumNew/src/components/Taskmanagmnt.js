import React, { Component } from "react";
import axios from "axios";

export default class Taskmanagmnt extends Component {
 constructor(props){
  super(props)
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
            {this.props.data.map((task) => (
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
