import axios from 'axios'
import React, { Component } from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar';

export class StudentAv extends Component {
    constructor(props){
        super(props)
        this.state = {
            valueSelect : '',
            studentAvs : [],
            students_av : [],
        }
    }
    onChange = (e)=>{
        let valueSelect = e.target.value
        let studentAvs = this.state.studentAvs
        let students_avs = []
        for(var i in studentAvs){
            let studentAv = studentAvs[i]
            if(studentAv.brief == valueSelect){
                studentAv = studentAvs[i]
                students_avs.push(studentAv)
            }
        }
        this.setState({
            students_av : students_avs
        })
    }
    getData = ()=>{
        axios.get('http://localhost:8000/api/studentAv')
        .then((res=>{
            this.setState({
                studentAvs : res.data.arr
            })
        }))
    }
    componentDidMount() {
        this.getData()
      }
  render() {
    return (
      <div>
        <h4>Etat d'avancement des apprenants</h4>
        <div className='studentAv'>
            <select onChange={this.onChange}  placeholder="Brief" id="input">
              <option>Brief</option>
              {this.props.data.map((item) => (
                <option value={item?.id}>{item?.Nom_du_brief}</option>
              ))}
            </select>
            <div>
                {this.state.students_av.map(item =>(
                    <><p>{item.student_name}</p>
                    <ProgressBar now={item.av} label={`${item.av}%`}/>
                    </>
                ))}
            </div>
        </div>
      </div>
    )
  }
}

export default StudentAv