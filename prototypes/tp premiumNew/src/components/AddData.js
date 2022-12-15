import React, { Component } from "react";
import axios from "axios";
import GetData from "./GetData";

export default class AddData extends Component {
  constructor(props) {
    super(props);
    this.state = {
        name : '',
        getData : []
    }
  }

  changeInput = (e)=>{
    this.setState({
        name : e.target.value
    })
  }
  addData = (e)=>{
    e.preventDefault()
    axios.post('http://localhost:8000/api/task',this.state)
    .then((res =>{
        console.log(res)
    }))
  }
  
  render() {
    return (
      <div className="mt-5">
        <form method="post">
            <input type='text' onChange={this.changeInput} className="form-control" placeholder="Add task"/>
            <button className="btn btn-primary mt-2" onClick={this.addData}>Add Task</button>
        </form>
        <GetData data={this.state.getData} />
      </div>
    );
  }
}
