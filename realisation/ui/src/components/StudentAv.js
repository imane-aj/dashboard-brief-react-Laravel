import axios from 'axios'
import React, { Component } from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar';

export class StudentAv extends Component {
    constructor(props){
        super(props)
        this.state = {
            valueSelect : '',
        }
    }
    onChange = (e)=>{
        this.setState({
            valueSelect : e.target.value
        })
    }
  render() {
    return (
      <div>
        <h4>Etat d'avancement des apprenants</h4>
        <div className='studentAv'>
        <select onChange={this.onChange} placeholder="année" id="input">
              <option>Année</option>
              {this.props.data.map((item) => (
                <option value={item.id}>{item.name}</option>
              ))}
            </select>
            {/* <div>
                {this.state.selectStudentAv.map(item =>(
                    <><p>{item.student_name}</p>
                    <ProgressBar now={item.av} label={`${item.av}%`}/>
                    </>
                ))}
            </div> */}
        </div>
      </div>
    )
  }
}

export default StudentAv