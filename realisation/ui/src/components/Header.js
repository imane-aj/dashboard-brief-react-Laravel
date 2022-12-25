import React, { Component } from 'react'
import axios from 'axios'

export default class Header extends Component {

    state = {
        years : [],
        value : '',
        goups: [],
        inputValue : ''
    }

    changeData = (e)=>{
        // console.log(e.target.value)
        this.setState({
            value : e.target.value
        })
    }
    getData = ()=>{
        axios.get('http://localhost:8000/api/group')
        .then((res=>{
            // console.log(res.data.years)
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
      <div>

        <select onChange={this.changeData} placeholder='année' id='input' value={this.state.value}>
        {this.state.years.map((item=>
            <option value={item.formation_year}>{item.formation_year}</option>
        ))}
        </select>

      </div>
    )
  }
}
