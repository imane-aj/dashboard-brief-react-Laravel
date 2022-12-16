import React, { Component } from "react";
import axios from "axios";
import Task from "./Task";

export default class Taskmanagmnt extends Component {
  constructor(props) {
    super(props);
    this.state = {
        name : '',
        data : [],
        id: ''
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

  //edit data
  edit = (id)=>{
    axios.get(`http://localhost:8000/api/task/${id}/edit`)
    .then((res =>{
      this.setState({
        name: res.data.name,
        id: res.data.id
      })
    }))
  }

  //update data
  update = (e)=>{
    e.preventDefault()
    let id = this.state.id
    axios.put(`http://localhost:8000/api/task/${id}`,this.state)
    .then((res=>{
      this.getData()
      this.state.name =''
    }))
  }
  render() {
    return (
      <div className="mt-5">
        <form method="post">
            <input type='text' onChange={this.changeInput} value={this.state.name} className="form-control" placeholder="Add task"/>
            <button className="btn btn-primary mt-2" onClick={this.addData}>Add Task</button>
            <button className="btn btn-success mt-2" onClick={this.update}>Update Task</button>
        </form>
        <Task data={this.state.data} delete={this.delete} edit={this.edit}/>
      </div>
    );
  }
}
