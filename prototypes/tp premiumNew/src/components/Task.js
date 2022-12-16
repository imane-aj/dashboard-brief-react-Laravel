import React, { Component } from "react";

export default class Task extends Component {
 constructor(props){
  super(props)
  // this.delete = this.delete.bind(this);
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
                  <button className="btn btn-danger" onClick={()=>this.props.delete(task.id)}>
                    Delete
                  </button>
                  <button className="btn btn-warning" onClick={()=>this.props.edit(task.id)}>Edit</button>
                </td>
              </tr>
              ))}
          </tbody>
        </table>
      </div>
    );
  }
}
