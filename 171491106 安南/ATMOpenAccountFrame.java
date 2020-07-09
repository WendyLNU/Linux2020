package atm;
import java.awt.Dimension;
import java.awt.GridLayout;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class ATMOpenAccountFrame extends JFrame{
	private JLabel jlOpenPasswd1,jlOpenPasswd2,jlName,jlPersonId,jlType;
	private JTextField jtOpenPasswd1,jtOpenPasswd2,jtName,jtPersonId,jtType;
	private JButton jbOK;
	private JPanel jp1,jp2,jp3,jp4,jp5,jp6;
	
	
	private Bank bank;
	
	public ATMOpenAccountFrame(){
		
		bank=new Bank();
		jlOpenPasswd1=new JLabel("账户密码:");
		jlOpenPasswd2=new JLabel("确认密码:");
		jlName=new JLabel("账户姓名:");
		jlPersonId=new JLabel("身份证号:");
		jlType=new JLabel("账户类型(0.储蓄 1.信用):");
		jtOpenPasswd1=new JTextField(20);
		jtOpenPasswd2=new JTextField(20);
		jtName=new JTextField(20);
		jtPersonId=new JTextField(20);
		jtType=new JTextField(12);
		jbOK=new JButton("注册确认");
		jp1=new JPanel();
		jp2=new JPanel();
		jp3=new JPanel();
		jp4=new JPanel();
		jp5=new JPanel();
		jp6=new JPanel();
		jp1.add(jlOpenPasswd1);
		jp1.add(jtOpenPasswd1);
		jp2.add(jlOpenPasswd2);
		jp2.add(jtOpenPasswd2);
		jp3.add(jlName);
		jp3.add(jtName);
		jp4.add(jlPersonId);
		jp4.add(jtPersonId);
		jp5.add(jlType);
		jp5.add(jtType);
		jp6.add(jbOK);
		//将每行逐行添加到frame中
		this.add(jp1);
		this.add(jp2);
		this.add(jp3);
		this.add(jp4);
		this.add(jp5);
		this.add(jp6);
		this.setLayout(new GridLayout(6, 1));//取消默认管理器,设置为3行1列的网格布局
		Dimension d=Toolkit.getDefaultToolkit().getScreenSize();
		this.setTitle("注册界面");
		this.setBounds((d.width-300)/2, (d.height-200)/2, 300, 200);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);//设置关闭窗口时JVM同时推出
		this.pack();//调整窗口至能容纳组件的最小尺寸
		this.setVisible(true);//设置窗口可见
		this.setResizable(false);//不能最大化
		
		//使用匿名内部类给按钮注册监听器
		jbOK.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					bank.openAccount(jtOpenPasswd1.getText(), jtOpenPasswd2.getText(),
							jtName.getText(), jtPersonId.getText(), jtType.getText());
					bank.saveAccountDate();
					dispose();//关闭窗口
				}
			}	
		);
	}
}

