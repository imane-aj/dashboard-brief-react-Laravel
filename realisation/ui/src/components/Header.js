import React, { Component } from 'react'
import axios from 'axios'

export default class Header extends Component {
    constructor(props) {
        super(props)
        this.state = {
            years : [],
            value : '',
            goups: [],
            selectedGroupt : ''
        }
    }

    changeData = (e)=>{
        let selected_group = {}
        let groups = this.state.groups
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
    }
    getData = ()=>{
        axios.get('http://localhost:8000/api/group')
        .then((res=>{
            this.setState({
                years : res.data.years,
                groups : res.data.groups
            })
        }))
    }
  
    componentDidMount(){
        this.getData()
        console.log(this.inputValue)
    }
  render() {
    return (
      <div className='row'>
        <div className='col-md-8'>
            <h1>tableau de borde d'état d'avancement</h1>
        </div>
        <div className='col-md-4 selectY'>
            <select onChange={this.changeData} placeholder='année' id='input'>
            {this.state.years.map((item=>
                <option value={item.id}>{item.formation_year}</option>
            ))}
            </select>
        </div>
       

        {/* <p>{this.state.selectedGroupt.id}</p> */}
      </div>
    )
  }
}
