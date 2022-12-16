import React, { Component } from "react";
import axios from "axios";
import Taskmanagmnt from "./Taskmanagmnt";

export default class Task extends Component {
  constructor(props) {
    super(props);
    this.state = {
        name : '',
        data : []
    }
  }

  // Add data
  changeInput = (e)=>{
    this.setState({
        name : e.target.value
    })
  }
  addData = (e)=>{
    e.preventDefault()
    axios.post('http://localhost:8000/api/task',this.state)
    .then((res =>{
      this.getData()
      this.state.name =''
    }))
  }

  // Getting data
  getData = ()=>{
    axios.get('http://localhost:8000/api/task')
    .then((res => {
      this.setState({
        data: res.data
      })
    }))
  }
  componentDidMount(){
    this.getData()
  }

  //delet data
  delete = (id)=>{
    axios.delete(`http://localhost:8000/api/task/${id}`)
    .then((res =>{
      this.getData()
    }))
  }
  render() {
    return (
      <div className="mt-5">
        <form method="post">
            <input type='text' onChange={this.changeInput} className="form-control" placeholder="Add task"/>
            <button className="btn btn-primary mt-2" onClick={this.addData}>Add Task</button>
        </form>
        <Taskmanagmnt data={this.state.data} />
      </div>
    );
  }
}
