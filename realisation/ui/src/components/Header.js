import React, { Component } from 'react'
import axios from 'axios'

export default class Header extends Component {
    constructor(props) {
        super(props)
        this.state = {
            years : [],
            goups: [],
            selectedGroupt : '',
            students : [],
            studentCount : ''
        }
    }

    changeData = (e)=>{
        let selected_group = {}
        let student_Count = {}
        let groups = this.state.groups
        let students = this.state.students
        let year_id = e.target.value
        for (var i in groups) {
            let group = groups[i]
            if (year_id == group.formation_id) {
                selected_group = groups[i]
                this.setState({
                    selectedGroupt : selected_group
                })
            }
        }
        
        for (var i in students) {
            let student = students[i]
            let arr = []
            if(selected_group.id == student.group_id){
                student_Count = students[i]
                console.log(student_Count)
                // console.log(Object.keys(student_Count).length)
            }
        }
       
    }
    getData = ()=>{
        axios.get('http://localhost:8000/api/group')
        .then((res=>{
            this.setState({
                years : res.data.years,
                groups : res.data.groups,
                students : res.data.students
            })
        }))
    }
  
    componentDidMount(){
        this.getData()
    }
  render() {
    return (
        <div>
      <div className='row'>
        <div className='col-md-8'>
            <h1>tableau de borde d'état d'avancement</h1>
        </div>
        <div className='col-md-4 selectY'>
            <select onChange={this.changeData} placeholder='année' id='input'>
                <option>Année</option>
            {this.state.years.map((item=>
                <option value={item.id}>{item.formation_year}</option>
            ))}
            </select>
        </div>
       
        <div className='row'>
                <div className='col-md-4'>
                    <img src='' alt='logo'></img>
                    <span>{this.state.selectedGroupt.name}</span>
                </div>
                <div className='col-md-4'></div>
                <div className='col-md-4'></div>
        </div>
        
      </div>
      </div>
    )
  }
}
