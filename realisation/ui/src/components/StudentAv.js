import axios from 'axios'
import React, { Component } from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar';

export class StudentAv extends Component {
    constructor(props){
        super(props)
        this.state = {
            valueSelect : '',
            studentAv : [],
            selectStudentAv : [],
            BriefAv : []
        }
    }
    onChange = (e)=>{
        let brief_id = e.target.value
        let students = this.props.selected_students
        let studentAv = this.state.studentAv
        let studentAvArray = []
        let BriefAv = this.state.BriefAv
        for(var i in students){
            let student = students[i]
            for(var i in studentAv){
                let studentAvance = studentAv[i]
                if((student.id == studentAvance.student_id) && (brief_id == studentAvance.brief)){
                    studentAvArray.push(studentAv[i])
                }
            }
            
        }
        this.setState({
            selectStudentAv : studentAvArray
        })
    }
   
    getData = ()=>{
        axios.get('http://localhost:8000/api/studentAv')
        .then((res=>{
            this.setState({
                studentAv : res.data.arr,
                BriefAv : res.data.arr1
            })
        }))
    }
    componentDidMount(){
        this.getData()
    }

  render() {
    return (
      <div>
        <h4>Etat d'avancement des apprenants</h4>
        <div className='studentAv'>
            <select onChange={this.onChange} placeholder="année" id="input">
                <option>Briefs</option>
                {Array.from(new Set(this.props.data)).map(item=>(
                    <option value={item.id}>{item.name}</option>
                ))}
            </select>
            <div>
                {this.state.selectStudentAv.map(item =>(
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