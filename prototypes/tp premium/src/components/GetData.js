import React, { Component } from "react";
import axios from "axios";

export default class GetData extends Component {
  constructor(props) {
    super(props);
    this.state = {
      tasks: [],
      task : '',
      id : ''
    };
  }

  changeData = (e)=>{
    this.setState({
        task: e.target.value
    })
  }

  addData = (e) =>{
    e.preventDefault()
    axios.post('http://localhost:8000/api/task',{
        name: this.state.task
    }).then((res) =>{
      this.getData()
      this.state.task=''
    })
  }

  getData = async () => {
    await axios.get("http://localhost:8000/api/task").then((res) =>
      this.setState({
        tasks: res.data,
      })
    );
  };
  componentDidMount() {
    this.getData();
  }

  deleteData = (id) => {
    axios.delete(`http://localhost:8000/api/task/${id}`).then(() => {
      this.getData();
    });
  };

  editData = (id) =>{
    axios.get(`http://localhost:8000/api/task/${id}/edit`).then((res =>{
      this.setState({
        task: res.data.name,
         id: res.data.id
        })
    }))
    console.log(this.state)
  }

  updateData = (e) =>{
    e.preventDefault()
    let id = this.state.id
    axios.put('http://localhost:8000/api/task/'+id,{
      name : this.state.task
    })
    .then((res => {
      this.getData()
      this.state.task=''
    }))
  }

  render() {
    return (
      <div>
        <form method="post">
            <input type='text' onChange={this.changeData} value={this.state.task}/>
            <button onClick={this.addData}>Add Task</button>
            <button onClick={this.updateData}>Update</button>
        </form>
        <table className="table table-danger">
          <thead>
            <tr>
              <th scope="col">Task</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            {this.state.tasks.map((task) => (
              <tr>
                <td>{task.name}</td>
                <td>
                  <button onClick={() => this.deleteData(task.id)}>
                    Delete
                  </button>
                  <button onClick={()=> this.editData(task.id)}>Edit</button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    );
  }
}
