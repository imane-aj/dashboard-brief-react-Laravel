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
                console.log(studentAv)
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
        <div className='studentAv'>
        <h4>Etat d'avancement des apprenants</h4>
            <select onChange={this.onChange}  placeholder="Brief" id="input">
              <option>Brief</option>
              {this.props.data.map((item) => (
                <option value={item?.brief_aff[0].id}>{item?.brief_aff[0].Nom_du_brief}</option>
              ))}
            </select>
            <div className='row mt-3'>
                {this.state.students_av.map(item =>(
                    <><div className='col-md-3'>{item.student_name}: </div> 
                    <div className='col-md-9'><ProgressBar now={item.av} label={`${item.av}%`}/></div>
                    </>
                ))}
            </div>
        </div>
      </div>
    )
  }
}

export default StudentAv